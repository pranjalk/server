<?php
/**
 * @copyright Copyright (c) 2016 Joas Schilling <coding@schilljs.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\WorkflowEngine\Check;


use OCP\Files\Storage\IStorage;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserSession;
use OCP\WorkflowEngine\ICheck;

class UserGroupMembership implements ICheck {

	/** @var string */
	protected $cachedUser;

	/** @var string[] */
	protected $cachedGroupMemberships;

	/** @var IUserSession */
	protected $userSession;

	/** @var IGroupManager */
	protected $groupManager;

	/**
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 */
	public function __construct(IUserSession $userSession, IGroupManager $groupManager) {
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
	}

	/**
	 * @param IStorage $storage
	 * @param string $path
	 */
	public function setFileInfo(IStorage $storage, $path) {
		// A different path doesn't change group memberships, so nothing to do here.
	}

	/**
	 * @param string $operator
	 * @param string $value
	 * @return bool
	 */
	public function executeCheck($operator, $value) {
		$user = $this->userSession->getUser();

		if ($user instanceof IUser) {
			$groupIds = $this->getUserGroups($user);
			return ($operator === 'is') === in_array($value, $groupIds);
		} else {
			return $operator !== 'is';
		}
	}


	/**
	 * @param string $operator
	 * @param string $value
	 * @throws \UnexpectedValueException
	 */
	public function validateCheck($operator, $value) {
		if (!in_array($operator, ['is', '!is'])) {
			throw new \UnexpectedValueException('Invalid operator', 1);
		}

		if (!$this->groupManager->groupExists($value)) {
			throw new \UnexpectedValueException('Group does not exist', 2);
		}
	}

	/**
	 * @param IUser $user
	 * @return string[]
	 */
	protected function getUserGroups(IUser $user) {
		$uid = $user->getUID();

		if ($this->cachedUser !== $uid) {
			$this->cachedUser = $uid;
			$this->cachedGroupMemberships = $this->groupManager->getUserGroupIds($user);
		}

		return $this->cachedGroupMemberships;
	}
}
