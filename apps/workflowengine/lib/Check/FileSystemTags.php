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


use OCP\Files\Cache\ICache;
use OCP\Files\Storage\IStorage;
use OCP\SystemTag\ISystemTagManager;
use OCP\SystemTag\ISystemTagObjectMapper;
use OCP\SystemTag\TagNotFoundException;
use OCP\WorkflowEngine\ICheck;

class FileSystemTags implements ICheck {

	/** @var array */
	protected $fileIds;

	/** @var array */
	protected $fileSystemTags;

	/** @var ISystemTagManager */
	protected $systemTagManager;

	/** @var ISystemTagObjectMapper */
	protected $systemTagObjectMapper;

	/** @var IStorage */
	protected $storage;

	/** @var string */
	protected $path;

	/**
	 * @param ISystemTagManager $systemTagManager
	 * @param ISystemTagObjectMapper $systemTagObjectMapper
	 */
	public function __construct(ISystemTagManager $systemTagManager, ISystemTagObjectMapper $systemTagObjectMapper) {
		$this->systemTagManager = $systemTagManager;
		$this->systemTagObjectMapper = $systemTagObjectMapper;
	}

	/**
	 * @param IStorage $storage
	 * @param string $path
	 */
	public function setFileInfo(IStorage $storage, $path) {
		$this->storage = $storage;
		$this->path = $path;
	}

	/**
	 * @param string $operator
	 * @param string $value
	 * @return bool
	 */
	public function executeCheck($operator, $value) {
		$systemTags = $this->getSystemTags();
		return ($operator === 'is') === in_array($value, $systemTags);
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

		try {
			$this->systemTagManager->getTagsByIds($value);
		} catch (TagNotFoundException $e) {
			throw new \UnexpectedValueException('Tag does not exist', 2);
		}
	}

	/**
	 * Get the ids of the assigned system tags
	 * @return string[]
	 */
	protected function getSystemTags() {
		$cache = $this->storage->getCache();
		$fileIds = $this->getFileIds($cache, $this->path);

		$systemTags = [];
		foreach ($fileIds as $i => $fileId) {
			if (isset($this->fileSystemTags[$fileId])) {
				$systemTags[] = $this->fileSystemTags[$fileId];
				unset($fileIds[$i]);
			}
		}

		if (!empty($fileIds)) {
			$mappedSystemTags = $this->systemTagObjectMapper->getTagIdsForObjects($fileIds, 'files');
			foreach ($mappedSystemTags as $fileId => $fileSystemTags) {
				$this->fileSystemTags[$fileId] = $fileSystemTags;
				$systemTags[] = $fileSystemTags;
			}
		}

		$systemTags = call_user_func_array('array_merge', $systemTags);
		$systemTags = array_unique($systemTags);
		return $systemTags;
	}

	/**
	 * Get the file ids of the given path and its parents
	 * @param ICache $cache
	 * @param string $path
	 * @return int[]
	 */
	protected function getFileIds(ICache $cache, $path) {
		$cacheId = $cache->getNumericStorageId();
		if (isset($this->fileIds[$cacheId][$path])) {
			return $this->fileIds[$cacheId][$path];
		}

		if ($path !== dirname($path)) {
			$parentIds = $this->getFileIds($cache, dirname($path));
		} else {
			return [];
		}

		$fileId = $cache->getId($path);
		if ($fileId !== -1) {
			$parentIds[] = $cache->getId($path);
		}

		$this->fileIds[$cacheId][$path] = $parentIds;

		return $parentIds;
	}
}
