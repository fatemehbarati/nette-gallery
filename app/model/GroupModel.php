<?php
namespace App\Model;


use App\Model\Entity\Repository\GroupRepository;

class GroupModel
{

    /** @param $groupRepo GroupRepository */
    public function __construct(GroupRepository $groupRepo)
    {

        $this->groupRepo = $groupRepo;
    }

    /**
     * @param $groupId
     * @return null|object
     */
    public function getGroupById($groupId)
    {

        return $this->groupRepo->find($groupId);
    }
}