<?php

namespace Ekkinox\SlimADR\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Ekkinox\SlimADR\Entity\EntityInterface;
use InvalidArgumentException;

/**
 * Class AbstractManager.
 */
abstract class AbstractManager implements ManagerInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        /*if (is_subclass_of($this->getEntity(), EntityInterface::class))
        {
            throw new InvalidArgumentException(
                sprintf(
                    'Entity class %s must be instance of %s',
                    $this->getEntity(),
                    EntityInterface::class
                )
            );
        }*/

        $this->repository = $this->entityManager->getRepository($this->getEntity());
    }

    /**
     * @return EntityRepository
     */
    public function getEntityRepository(): EntityRepository
    {
        return $this->repository;
    }

    /**
     * @return EntityInterface
     */
    public function create(): EntityInterface
    {
        $entity = $this->getEntity();

        return new $entity();
    }

    /**
     * @param $id
     *
     * @return EntityInterface
     */
    public function find($id): EntityInterface
    {
        return $this->repository->find($id);
    }

    /**
     * @param array      $criteria
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return EntityInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): array
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @return EntityInterface[]
     */
    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function save($entity): EntityInterface
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function edit($entity): EntityInterface
    {
        return $this->save($entity);
    }

    /**
     * @param EntityInterface $entity
     */
    public function delete($entity)
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }
}
