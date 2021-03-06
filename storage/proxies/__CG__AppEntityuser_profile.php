<?php

namespace proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class user_profile extends \App\Entity\user_profile implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'id', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'dob', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'phone_number', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'occupation', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'work', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'college', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'school', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'marital_status', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'huntingLand', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'users', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'profile_photo_name'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'id', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'dob', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'phone_number', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'occupation', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'work', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'college', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'school', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'marital_status', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'huntingLand', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'users', '' . "\0" . 'App\\Entity\\user_profile' . "\0" . 'profile_photo_name'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (user_profile $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getDob()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDob', []);

        return parent::getDob();
    }

    /**
     * {@inheritDoc}
     */
    public function setDob($dob)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDob', [$dob]);

        return parent::setDob($dob);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getOccupation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOccupation', []);

        return parent::getOccupation();
    }

    /**
     * {@inheritDoc}
     */
    public function setOccupation($occupation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOccupation', [$occupation]);

        return parent::setOccupation($occupation);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhoneNumber()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhoneNumber', []);

        return parent::getPhoneNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhoneNumber($phone_number)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhoneNumber', [$phone_number]);

        return parent::setPhoneNumber($phone_number);
    }

    /**
     * {@inheritDoc}
     */
    public function getWork()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWork', []);

        return parent::getWork();
    }

    /**
     * {@inheritDoc}
     */
    public function setWork($work)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWork', [$work]);

        return parent::setWork($work);
    }

    /**
     * {@inheritDoc}
     */
    public function getCollege()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCollege', []);

        return parent::getCollege();
    }

    /**
     * {@inheritDoc}
     */
    public function setCollege($college)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCollege', [$college]);

        return parent::setCollege($college);
    }

    /**
     * {@inheritDoc}
     */
    public function getHuntingLand()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHuntingLand', []);

        return parent::getHuntingLand();
    }

    /**
     * {@inheritDoc}
     */
    public function getSchool()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSchool', []);

        return parent::getSchool();
    }

    /**
     * {@inheritDoc}
     */
    public function setSchool($school)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSchool', [$school]);

        return parent::setSchool($school);
    }

    /**
     * {@inheritDoc}
     */
    public function getMarital_status()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMarital_status', []);

        return parent::getMarital_status();
    }

    /**
     * {@inheritDoc}
     */
    public function setMarital_status($marital_status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMarital_status', [$marital_status]);

        return parent::setMarital_status($marital_status);
    }

    /**
     * {@inheritDoc}
     */
    public function setHuntingLand($huntingLand)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHuntingLand', [$huntingLand]);

        return parent::setHuntingLand($huntingLand);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsers', []);

        return parent::getUsers();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsers($users)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsers', [$users]);

        return parent::setUsers($users);
    }

    /**
     * {@inheritDoc}
     */
    public function getProfile_photo_name()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProfile_photo_name', []);

        return parent::getProfile_photo_name();
    }

    /**
     * {@inheritDoc}
     */
    public function setProfile_photo_name($profile_photo_name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProfile_photo_name', [$profile_photo_name]);

        return parent::setProfile_photo_name($profile_photo_name);
    }

}
