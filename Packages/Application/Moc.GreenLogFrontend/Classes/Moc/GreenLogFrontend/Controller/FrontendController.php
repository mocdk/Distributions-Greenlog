<?php
namespace Moc\GreenLogFrontend\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Moc.GreenLogFrontend".  *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use Moc\GreenLog\Domain\Model\Installation;
use Moc\GreenLog\Domain\Model\Deployment;

use Moc\GreenLog\Domain\Repository\InstallationRepository;
use Moc\GreenLog\Domain\Repository\DeploymentRepository;

class FrontendController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @var InstallationRepository
	 * @Flow\Inject
	 */
	protected $installationRepository;

	/**
	 * @var DeploymentRepository
	 * @Flow\Inject
	 */
	protected $deploymentRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$installations = $this->installationRepository->findAll();
		$this->view->assign('installations', $installations);
	}

	/**
	 * @param Installation $installation
	 * @return void
	 */
	public function showInstallationAction(Installation $installation) {
		$this->view->assign('installation', $installation);
	}

	/**
	 * @param Deployment $deployment
	 * @return void
	 */
	public function showDeploymentAction(Deployment $deployment) {
		$this->view->assign('deployment', $deployment);
	}

}