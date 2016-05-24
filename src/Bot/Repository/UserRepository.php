<?php
namespace Bot\Repository;

use Bot\Entity\User;
use Predis\Client;

class UserRepository
{
    /**
     * @var Client
     */
    private $redis;

    public function __construct(Client $redis)
    {
        $this->redis = $redis;
    }

    public function save(User $user)
    {
        $this->redis->hmset('user:' . $user->getId(), [
            'name' => $user->getName(),
        ]);
    }

    /**
     * @param string $id
     * @return User|null
     */
    public function findById(string $id)
    {
        $data = $this->redis->hgetall('user:' . $id);
        if (!$data) {
            return null;
        }

        $user = (new User())
            ->setName($data['name'])
            ->setId($id);
        
        return $user;
    }

    public function deleteById(string $id)
    {
        $this->redis->del('user:' . $id);
    }
}
