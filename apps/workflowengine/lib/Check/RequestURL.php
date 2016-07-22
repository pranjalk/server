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


use OCP\IRequest;

class RequestURL extends AbstractStringCheck {

	/** @var string */
	protected $url;

	/** @var IRequest */
	protected $request;

	/**
	 * @param IRequest $request
	 */
	public function __construct(IRequest $request) {
		$this->request = $request;
	}

	/**
	 * @return string
	 */
	protected function getActualValue() {
		if ($this->url !== null) {
			return $this->url;
		}

		$this->url = $this->request->getServerProtocol() . '://';// E.g. http(s) + ://
		$this->url .= $this->request->getServerHost();// E.g. localhost
		$this->url .= $this->request->getScriptName();// E.g. /nextcloud/index.php
		$this->url .= $this->request->getPathInfo();// E.g. /apps/files_texteditor/ajax/loadfile

		return $this->url; // E.g. https://localhost/nextcloud/index.php/apps/files_texteditor/ajax/loadfile
	}
}
