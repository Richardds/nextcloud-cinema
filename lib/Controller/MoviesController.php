<?php

namespace OCA\Cinema\Controller;

use Exception;
use OC\AppFramework\Http;
use OCA\Cinema\Db\MovieMapper;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class MoviesController extends Controller
{
    private $mapper;
    private $userId;

    public function __construct($AppName, IRequest $request, MovieMapper $mapper, $UserId)
    {
        parent::__construct($AppName, $request);
        $this->mapper = $mapper;
        $this->userId = $UserId;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function get()
    {
        try {
            return new DataResponse($this->mapper->findAll());
        } catch (Exception $e) {
            return new DataResponse([], Http::STATUS_NOT_FOUND);
        }
    }
}
