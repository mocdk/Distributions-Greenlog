<?php
namespace Moc\GreenLogApi\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Moc.GreenLogApi".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

use Moc\GreenLog\Domain\Model\Installation;
use Moc\GreenLog\Domain\Model\Deployment;
use Moc\GreenLog\Domain\Model\Commit;

use Moc\GreenLog\Domain\Repository\InstallationRepository;
use Moc\GreenLog\Domain\Repository\DeploymentRepository;
use Moc\GreenLog\Domain\Repository\CommitRepository;

class ApiController extends \TYPO3\Flow\Mvc\Controller\ActionController {

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
	 * @var CommitRepository
	 * @Flow\Inject
	 */
	protected $commitRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

	/**
	 * @return void
	 */
	public function registerDeploymentAction() {
		$requestData = json_decode($this->request->getHttpRequest()->getContent());

		if (!$installation = $this->installationRepository->findOneByHostnameAndRemote($requestData->hostname, $requestData->remote)) {
			$installation = new Installation();
			$installation->setHostName($requestData->hostname);
			$installation->setRemote($requestData->remote);
			$this->installationRepository->add($installation);
		}

		$deployment = new Deployment();
		$deployment->setDeployTime(new \DateTime());
		$deployment->setUser($requestData->user);

		$deployment->setInstallation($installation);
		$this->deploymentRepository->add($deployment);

		foreach ($requestData->commits as $comitData) {
			$comit = new Commit();
			$comit->setSha1($comitData->sha1);
			$comit->setDate(\DateTime::createFromFormat('D M j H:i:s Y O', $comitData->date));
			$comit->setAuthor($comitData->author);
			$comit->setCommitter($comitData->committer);
			$comit->setMessage($comitData->message);
			$comit->setDeployment($deployment);

			$this->commitRepository->add($comit);
		}

		$this->persistenceManager->persistAll();

		return 'Deployment registered';
	}

	/**
	 * @return string
	 */
	public function getScriptAction(){
		$script = file_get_contents('resource://Moc.GreenLogApi/Private/gitHooks/post-checkout.php');
		return $script;
	}

	/**
	 * @param string $version
	 * @return string
	 */
	public function updateScriptAction($version){
		if($version !== md5_file('resource://Moc.GreenLogApi/Private/gitHooks/post-checkout.php')) {
//			$this->response->setHeader('Content-Type', 'application/x-httpd-php-source');
			return file_get_contents('resource://Moc.GreenLogApi/Private/gitHooks/post-checkout.php');
		} else {
			$this->response->setStatus(204);
			return '';
		}
	}

}