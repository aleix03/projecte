<?php
/**
 * ownCloud
 *
 * @author Tom Needham <tom@owncloud.com>
 * @author Michael Barz <mbarz@owncloud.com>
 * @copyright (C) 2018 ownCloud GmbH
 * @license ownCloud Commercial License
 *
 * This code is covered by the ownCloud Commercial License.
 *
 * You should have received a copy of the ownCloud Commercial License
 * along with this program. If not, see
 * <https://owncloud.com/licenses/owncloud-commercial/>.
 *
 */

namespace OCA\Files_Lifecycle\Storage;

use OC\Files\Storage\Local;
use OC\User\User;

/**
 * Class Archive
 *
 * @package OCA\Files_Lifecycle\Storage
 */
class Archive extends Local {
	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var \OC\User\User $user
	 */
	protected $user;

	/**
	 * Archive constructor.
	 *
	 * @param array $arguments
	 */
	public function __construct($arguments) {
		$this->user = $arguments['user'];
		$this->id = 'archive::' . $this->user->getUID();
		parent::__construct($arguments);
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getDataDir() {
		return $this->datadir;
	}

	/**
	 * Returns the owner of this home storage
	 *
	 * @return User owner of this home storage
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * get the owner of a path
	 *
	 * @param string $path The path to get the owner
	 *
	 * @return string uid or false
	 */
	public function getOwner($path) {
		return $this->user->getUID();
	}
}
