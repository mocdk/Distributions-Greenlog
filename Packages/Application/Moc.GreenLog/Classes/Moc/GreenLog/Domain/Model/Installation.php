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
class Installation {

	/**
	 * @var string
	 * @ORM\Column(nullable=true)
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $remote;

	/**
	 * @var string
	 */
	protected $hostName;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection<\Moc\GreenLog\Domain\Model\Deployment>
	 * @ORM\OneToMany(mappedBy="installation")
	 */
	protected $deployments;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRemote() {
		return $this->remote;
	}

	/**
	 * @param string $remote
	 * @return $this
	 */
	public function setRemote($remote) {
		$this->remote = $remote;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getHostName() {
		return $this->hostName;
	}

	/**
	 * @param string $hostName
	 * @return $this
	 */
	public function setHostName($hostName) {
		$this->hostName = $hostName;
		return $this;
	}

	/**
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getDeployments() {
		return $this->deployments;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $deployments
	 * @return $this
	 */
	public function setDeployments($deployments) {
		$this->deployments = $deployments;
		return $this;
	}

}