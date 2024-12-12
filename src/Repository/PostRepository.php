<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Comment;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findByHashtag(string $hashtag): array
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.hashtags', 'h')
            ->where('h.name LIKE :hashtag')
            ->setParameter('hashtag', '%' . $hashtag . '%')
            ->getQuery()
            ->getResult();
    }

    public function deleteById(string $id): void
    {
        $entityManager = $this->getEntityManager();

        // Eliminamos primero los comentarios asociados
        $entityManager->createQueryBuilder()
            ->delete(Comment::class, 'c')
            ->where('c.post = :postId')
            ->setParameter('postId', $id)
            ->getQuery()
            ->execute();

        // Eliminamos el post
        $this->createQueryBuilder('p')
            ->delete()
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

//    /**
//     * @return Post[] Returns an array of Post objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Post
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
