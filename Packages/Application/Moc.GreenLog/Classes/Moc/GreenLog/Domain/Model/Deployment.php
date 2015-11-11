<?php
namespace Moc\GreenLog\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Moc.GreenLog".          *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Deployment {

	/**
	 * @var \Moc\GreenLog\Domain\Model\Installation
	 * @ORM\ManyToOne(cascade={"persist"})
	 */
	protected $installation;

	/**
	 * @var string
	 */
	protected $user;

	/**
	 * @var \DateTime
	 */
	protected $deployTime;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\Moc\GreenLog\Domain\Model\Commit>
	 * @ORM\OneToMany(mappedBy="deployment")
	 */
	protected $commits;

	/**
	 * @return Installation
	 */
	public function getInstallation() {
		return $this->installation;
	}

	/**
	 * @param Installation $installation
	 * @return $this
	 */
	public function setInstallation($installation) {
		$this->installation = $installation;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param string $user
	 * @return $this
	 */
	public function setUser($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDeployTime() {
		return $this->deployTime;
	}

	/**
	 * @param \DateTime $deployTime
	 * @return $this
	 */
	public function setDeployTime($deployTime) {
		$this->deployTime = $deployTime;
		return $this;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getCommits() {
		return $this->commits;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $commits
	 * @return $this
	 */
	public function setCommits($commits) {
		$this->commits = $commits;
		return $this;
	}

}