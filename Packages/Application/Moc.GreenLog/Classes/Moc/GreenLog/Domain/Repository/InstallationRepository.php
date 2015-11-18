<?php
namespace Moc\GreenLog\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Moc.GreenLog".          *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class InstallationRepository extends Repository {

	protected $defaultOrderings = array(
		'name' => \TYPO3\Flow\Persistence\QueryInterface::ORDER_ASCENDING,
		'hostName' => \TYPO3\Flow\Persistence\QueryInterface::ORDER_ASCENDING
	);

	// add customized methods here

	public function findOneByHostnameAndRemote($hostname, $remote) {
		$query = $this->createQuery();

		$query->matching(
			$query->logicalAnd(
				$query->equals('remote', $remote, FALSE),
				$query->equals('hostName', $hostname, FALSE)
			)
		);

		return $query->execute(FALSE)->getFirst();
	}

}