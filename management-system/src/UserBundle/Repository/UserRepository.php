<?php

namespace UserBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

	public function getAllPosts($currentPage = 1)
{
    // Create our query
    $query = $this->createQueryBuilder('p')
        ->orderBy('p.created', 'DESC')
        ->getQuery();

    // No need to manually get get the result ($query->getResult())

    $paginator = $this->paginate($query, $currentPage);

    return $paginator;
}

public function paginate($dql, $page = 1, $limit = 5)
{
    $paginator = new Paginator($dql);

    $paginator->getQuery()
        ->setFirstResult($limit * ($page - 1)) // Offset
        ->setMaxResults($limit); // Limit

    return $paginator;
}

}
