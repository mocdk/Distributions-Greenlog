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

	// add customized methods here

	public function findOneByHostnameAndRemote($hostname, $remote) {
		$query = $this->createQuery();

		return $query->matching(
			$query->equals('remote', $remote, FALSE)
		)->execute(FALSE)->getFirst();
	}

}