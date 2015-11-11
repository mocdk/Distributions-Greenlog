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
class Commit {

	/**
	 * @var \Moc\GreenLog\Domain\Model\Deployment
	 * @ORM\ManyToOne(cascade={"persist"})
	 */
	protected $deployment;

	/**
	 * @var string
	 */
	protected $sha1;

	/**
	 * @var \DateTime
	 */
	protected $date;

	/**
	 * @var string
	 */
	protected $author;

	/**
	 * @var string
	 */
	protected $committer;

	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @return Deployment
	 */
	public function getDeployment() {
		return $this->deployment;
	}

	/**
	 * @param Deployment $deployment
	 * @return $this
	 */
	public function setDeployment($deployment) {
		$this->deployment = $deployment;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSha1() {
		return $this->sha1;
	}

	/**
	 * @param string $sha1
	 * @return $this
	 */
	public function setSha1($sha1) {
		$this->sha1 = $sha1;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param \DateTime $date
	 * @return $this
	 */
	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @param string $author
	 * @return $this
	 */
	public function setAuthor($author) {
		$this->author = $author;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCommitter() {
		return $this->committer;
	}

	/**
	 * @param string $committer
	 * @return $this
	 */
	public function setCommitter($committer) {
		$this->committer = $committer;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setMessage($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMessageFirstLine() {
		$lines = explode(PHP_EOL, $this->message, 2);

		return $lines[0];
	}

}