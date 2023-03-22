<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Service\Intent;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string    accountSid
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string    fieldType
 * @property string    intentSid
 * @property string    serviceSid
 * @property string    sid
 * @property string    uniqueName
 * @property string    url
 */
class FieldInstance extends InstanceResource
{
    /**
     * Initialize the FieldInstance
     *
     * @param \Twilio\Version $version    Version that contains the resource
     * @param mixed[]         $payload    The response payload
     * @param string          $serviceSid The service_sid
     * @param string          $intentSid  The intent_sid
     * @param string          $sid        The sid
     *
     * @return \Twilio\Rest\Preview\Understand\Service\Intent\FieldInstance
     */
    public function __construct(Version $version, array $payload, $serviceSid, $intentSid, $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = array(
            'accountSid'  => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'fieldType'   => Values::array_get($payload, 'field_type'),
            'intentSid'   => Values::array_get($payload, 'intent_sid'),
            'serviceSid'  => Values::array_get($payload, 'service_sid'),
            'sid'         => Values::array_get($payload, 'sid'),
            'uniqueName'  => Values::array_get($payload, 'unique_name'),
            'url'         => Values::array_get($payload, 'url'),
        );

        $this->solution = array(
            'serviceSid' => $serviceSid,
            'intentSid'  => $intentSid,
            'sid'        => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return \Twilio\Rest\Preview\Understand\Service\Intent\FieldContext Context
     *                                                                     for this
     *                                                                     FieldInstance
     */
    protected function proxy()
    {
        if (!$this->context) {
            $this->context = new FieldContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['intentSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch a FieldInstance
     *
     * @return FieldInstance Fetched FieldInstance
     */
    public function fetch()
    {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the FieldInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete()
    {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     *
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (property_exists($this, '_'.$name)) {
            $method = 'get'.ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: '.$name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString()
    {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Understand.FieldInstance '.implode(' ', $context).']';
    }
}