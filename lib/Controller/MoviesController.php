<?php

namespace OCA\Cinema\Controller;

use Exception;
use OC\AppFramework\Http;
use OCA\Cinema\Db\MovieMapper;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\ILogger;
use OCP\IRequest;

class MoviesController extends Controller
{
    /**
     * @var ILogger
     */
    private $logger;

    /**
     * @var MovieMapper
     */
    private $mapper;

    /**
     * @var integer
     */
    private $userId;

    public function __construct($AppName, IRequest $request, ILogger $logger, MovieMapper $mapper, $UserId)
    {
        parent::__construct($AppName, $request);
        $this->logger = $logger;
        $this->mapper = $mapper;
        $this->userId = $UserId;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function all()
    {
        try {
            return new DataResponse($this->mapper->findAll());
        } catch (Exception $e) {
            $this->logger->logException($e);
            return new DataResponse([], Http::STATUS_NOT_FOUND);
        }
    }
}
