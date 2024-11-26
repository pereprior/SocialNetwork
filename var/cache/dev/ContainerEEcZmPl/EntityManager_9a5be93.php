<?php

namespace ContainerEEcZmPl;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/src/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/src/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderaa31b = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer5d1f9 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties3ba05 = [
        
    ];

    public function getConnection()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getConnection', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getMetadataFactory', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getExpressionBuilder', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'beginTransaction', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getCache', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getCache();
    }

    public function transactional($func)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'transactional', array('func' => $func), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'wrapInTransaction', array('func' => $func), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'commit', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->commit();
    }

    public function rollback()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'rollback', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getClassMetadata', array('className' => $className), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'createQuery', array('dql' => $dql), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'createNamedQuery', array('name' => $name), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'createQueryBuilder', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'flush', array('entity' => $entity), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'clear', array('entityName' => $entityName), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->clear($entityName);
    }

    public function close()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'close', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->close();
    }

    public function persist($entity)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'persist', array('entity' => $entity), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'remove', array('entity' => $entity), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->remove($entity);
    }

    public function refresh($entity, ?int $lockMode = null)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'refresh', array('entity' => $entity, 'lockMode' => $lockMode), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->refresh($entity, $lockMode);
    }

    public function detach($entity)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'detach', array('entity' => $entity), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'merge', array('entity' => $entity), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getRepository', array('entityName' => $entityName), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'contains', array('entity' => $entity), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getEventManager', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getConfiguration', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'isOpen', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getUnitOfWork', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getProxyFactory', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'initializeObject', array('obj' => $obj), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->initializeObject($obj);
    }

    public function isUninitializedObject($obj) : bool
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'isUninitializedObject', array('obj' => $obj), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->isUninitializedObject($obj);
    }

    public function getFilters()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'getFilters', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'isFiltersStateClean', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'hasFilters', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return $this->valueHolderaa31b->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer5d1f9 = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, ?\Doctrine\Common\EventManager $eventManager = null)
    {
        static $reflection;

        if (! $this->valueHolderaa31b) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderaa31b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderaa31b->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, '__get', ['name' => $name], $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        if (isset(self::$publicProperties3ba05[$name])) {
            return $this->valueHolderaa31b->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderaa31b;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderaa31b;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderaa31b;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderaa31b;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, '__isset', array('name' => $name), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderaa31b;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderaa31b;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, '__unset', array('name' => $name), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderaa31b;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderaa31b;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, '__clone', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        $this->valueHolderaa31b = clone $this->valueHolderaa31b;
    }

    public function __sleep()
    {
        $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, '__sleep', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;

        return array('valueHolderaa31b');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(?\Closure $initializer = null) : void
    {
        $this->initializer5d1f9 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer5d1f9;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer5d1f9 && ($this->initializer5d1f9->__invoke($valueHolderaa31b, $this, 'initializeProxy', array(), $this->initializer5d1f9) || 1) && $this->valueHolderaa31b = $valueHolderaa31b;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderaa31b;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderaa31b;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
