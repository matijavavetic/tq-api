<?php

namespace src\Listeners;

use Doctrine\ORM\EntityManager;
use LaravelDoctrine\ORM\IlluminateRegistry;
use src\Events\DatabaseRollbackAfterTestsEvent;

class DatabaseRollback
{
    protected EntityManager $em;

    public function __construct(
        IlluminateRegistry $mr
    ) {
        $this->em = $mr->getManager();
    }

    public function handle(DatabaseRollbackAfterTestsEvent $event)
    {
        foreach ($event->fixtureObjects as $fixtureObject) {
            $entityRepository = $this->em->getRepository(get_class($fixtureObject));

            $entity = $entityRepository->findBy([
                'uuid' => $fixtureObject->getUuid()
            ]);
            
            if ($entity) {
                $this->em->remove($fixtureObject);
            }
        }

        $this->em->flush();
    }
}
