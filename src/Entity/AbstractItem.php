<?php
namespace ShopAPI\Client\Entity;

abstract class AbstractItem extends AbstractRecord {
    /**
     * @var string
     */
    protected $name, $ean, $code;

    /**
     * @var float
     */
    protected $price, $priceRetail;

    /**
     * @var Image[]
     */
    protected $images = [];

    /**
     * @var AttributeValue[]
     */
    protected $attributes = [];

    /**
     * @var \DateTime
     */
    protected $updated;

    /**
     * @var Availability
     */
    protected $availability;

    public function getName():?string {
        return $this->name;
    }

    public function setName(?string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getEan():?string {
        return $this->ean;
    }

    public function setEan(?string $ean): self {
        $this->ean = $ean;
        return $this;
    }

    public function getCode():?string {
        return $this->code;
    }

    public function setCode(?string $code): self {
        $this->code = $code;
        return $this;
    }

    public function getUpdated(): \DateTime {
        return $this->updated;
    }

    public function setUpdated(\DateTime $updated): self {
        $this->updated = $updated;
        return $this;
    }

    public function getPrice():?float {
        return $this->price;
    }

    public function setPrice(?float $price): self {
        $this->price = $price;
        return $this;
    }

    public function getPriceRetail():?float {
        return $this->priceRetail;
    }

    public function setPriceRetail(?float $priceRetail): self {
        $this->priceRetail = $priceRetail;
        return $this;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array {
        return $this->images;
    }

    public function setImages(array $images): self {
        $this->images = [];
        foreach ($images as $image) {
            $this->addImage($image);
        }
        return $this;
    }

    public function addImage(Image $image): self {
        $this->images[] = $image;
        return $this;
    }

    /**
     * @return AttributeValue[]
     */
    public function getAttributes(): array {
        return array_values($this->attributes);
    }

    public function getAttribute(string $uid):?AttributeValue {
        return isset($this->attributes[$uid]) ? $this->attributes[$uid] : null;
    }

    /**
     * @param AttributeValue[] $attributeValues
     * @return $this
     */
    public function setAttributes(array $attributeValues): self {
        $this->attributes = [];
        foreach ($attributeValues as $attributeValue) {
            $this->addAttribute($attributeValue);
        }
        return $this;
    }

    public function addAttribute(AttributeValue $attributeValue): self {
        $this->attributes[$attributeValue->getAttribute()->getUid()] = $attributeValue;
        return $this;
    }

    public function getAvailability(): Availability {
        return $this->availability;
    }

    public function setAvailability(Availability $availability): self {
        $this->availability = $availability;
        return $this;
    }


}
