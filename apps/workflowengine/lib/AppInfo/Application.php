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

namespace OCA\WorkflowEngine\AppInfo;

use OCP\WorkflowEngine\RegisterCheckEvent;

class Application extends \OCP\AppFramework\App {

	public function __construct() {
		parent::__construct('files_workflowengine');

		$this->getContainer()->registerAlias('FlowOperationsController', 'OCA\FilesWorkflowEngine\Controller\FlowOperations');
	}

	/**
	 * Register all hooks and listeners
	 */
	public function registerHooksAndListeners() {
		$this->getContainer()->getServer()->getEventDispatcher()->addListener(
			'OCP\WorkflowEngine\RegisterCheckEvent',
			function(RegisterCheckEvent $event) {
				/** @var \OCP\IL10N $l */
				$l = $this->getContainer()->query('OCP\IL10N');

				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\FileMimeType',
					$l->t('File mimetype'),
					['is', '!is', 'matches', '!matches']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\FileSize',
					$l->t('File size'),
					['less', '!less', 'greater', '!greater']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\FileSystemTags',
					$l->t('File system tags'),
					['is', '!is']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\RequestRemoteAddress',
					$l->t('Request IP address'),
					['matchesIPv4', '!matchesIPv4', 'matchesIPv6', '!matchesIPv6']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\RequestTime',
					$l->t('Request time'),
					['in', '!in']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\RequestURL',
					$l->t('Request URL'),
					['is', '!is', 'matches', '!matches']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\RequestUserAgent',
					$l->t('Request User Agent'),
					['is', '!is', 'matches', '!matches']
				);
				$event->addCheck(
					'OCA\FilesWorkflowEngine\Check\UserGroupMembership',
					$l->t('User group membership'),
					['is', '!is']
				);
			},
			-100
		);
	}
}
