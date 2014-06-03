<?php

/**
 * Contains GO1\Gridster\Normalizer\GridNormalizer
 */

namespace GO1\Gridster\Normalizer;

use GO1\Gridster\Widget\WidgetInterface;
use GO1\Gridster\GridMaster\GridMasterInterface;
use GO1\Gridster\Source\WidgetTypeInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;

/**
 * …
 */
class GridNormalizer extends SerializerAwareNormalizer implements NormalizerInterface
{

    /**
     * Callbacks
     *
     * @var array
     */
    protected $callbacks = [];

    /**
     * …
     *
     * @var array
     */
    protected $ignoredAttributes = [];

    /**
     * …
     *
     * @var array
     */
    protected $camelizedAttributes = [];

    /**
     * Set normalization callbacks.
     *
     * @param callable[] $callbacks help normalize the result
     * @throws InvalidArgumentException if a non-callable callback is set
     */
    public function setCallbacks(array $callbacks)
    {
        foreach ($callbacks as $attribute => $callback) {
            if (!is_callable($callback)) {
                $msg = sprintf('The given callback for attribute "%s" is not callable.', $attribute);
                throw new InvalidArgumentException($msg);
            }
        }
        $this->callbacks = $callbacks;
    }

    /**
     * Set ignored attributes for normalization
     *
     * @param array $ignoredAttributes
     */
    public function setIgnoredAttributes(array $ignoredAttributes)
    {
        $this->ignoredAttributes = $ignoredAttributes;
    }

    /**
     * Set attributes to be camelized on denormalize
     *
     * @param array $camelizedAttributes
     */
    public function setCamelizedAttributes(array $camelizedAttributes)
    {
        $this->camelizedAttributes = $camelizedAttributes;
    }

    /**
     * Check denormalization supporting.
     * 
     * @return boolean
     */
    public function supportsDenormalization()
    {
        return false;
    }

    /**
     * Checks whether the given class is supported for normalization by this normalizer
     *
     * @param mixed  $data   Data to normalize.
     * @param string $format The format being (de-)serialized from or into.
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        if (is_object($data)) {
            return ($data instanceof GridMasterInterface)
                        || ($data instanceof WidgetInterface)
                        || ($data instanceof WidgetTypeInterface);
        }

        return false;
    }

    /**
     * Normalizes an object into a set of arrays/scalars
     *
     * @param GridMasterInterface $object object to normalize
     * @param string $format format the normalization result will be encoded as
     * @param array $context Context options for the normalizer
     *
     * @return array|scalar
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $reflectionObject = new \ReflectionObject($object);
        $reflectionMethods = $reflectionObject->getMethods(\ReflectionMethod::IS_PUBLIC);

        $attributes = array();
        foreach ($reflectionMethods as $method) {
            if ($this->isGetMethod($method)) {
                $attributeName = lcfirst(substr($method->name, 3));

                if (in_array($attributeName, $this->ignoredAttributes)) {
                    continue;
                }

                $attributeValue = $method->invoke($object);
                if (array_key_exists($attributeName, $this->callbacks)) {
                    $attributeValue = call_user_func($this->callbacks[$attributeName], $attributeValue);
                }
                if (null !== $attributeValue && !is_scalar($attributeValue)) {
                    if (!$this->serializer instanceof NormalizerInterface) {
                        $msg = sprintf('Cannot normalize attribute "%s" because injected serializer is not a normalizer', $attributeName);
                        throw new \LogicException($msg);
                    }
                    $attributeValue = $this->serializer->normalize($attributeValue, $format);
                }

                $attributes[$attributeName] = $attributeValue;
            }
        }

        return $attributes;
    }

    /**
     * Checks if a method's name is get.* and can be called without parameters.
     *
     * @param \ReflectionMethod $method the method to check
     *
     * @return bool    whether the method is a getter.
     */
    private function isGetMethod(\ReflectionMethod $method)
    {
        return (
            0 === strpos($method->name, 'get')
            && 3 < strlen($method->name)
            && 0 === $method->getNumberOfRequiredParameters()
        );
    }

}
