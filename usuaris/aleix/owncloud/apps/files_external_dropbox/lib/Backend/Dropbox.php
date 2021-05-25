<?php
/**
 * @author Hemant Mann <hemant.mann121@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
 * @license GPL-2.0
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 */

namespace OCA\Files_external_dropbox\Backend;

use OCP\IL10N;
use OCP\Files\External\Backend\Backend;
use OCP\Files\External\DefinitionParameter;
use OCP\Files\External\Auth\AuthMechanism;

class Dropbox extends Backend {

	/**
	 * Dropbox constructor.
	 * @param IL10N $l
	 */
	public function __construct(IL10N $l) {
		$this
			->setIdentifier('files_external_dropbox')
			->addIdentifierAlias('\OC\Files\External_Storage\Dropbox') // legacy compat
			->setStorageClass('\OCA\Files_external_dropbox\Storage\Dropbox')
			->setText($l->t('Dropbox V2'))
			->addParameters([
				
			])
			->addAuthScheme(AuthMechanism::SCHEME_OAUTH2)
			->addCustomJs(['files_external_dropbox', 'dropbox'])
		;
	}
}
