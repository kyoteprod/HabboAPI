<?php

use HabboAPI\Entities\Furni;

class FurniTest extends \PHPUnit_Framework_TestCase
{
    private static $data;
    /** @var Furni $wall_item */
    private $wall_item;
    /** @var Furni $room_item */
    private $room_item;

    public static function setUpBeforeClass()
    {
        self::$data = (array)new SimpleXMLElement(file_get_contents(dirname(__FILE__) . '/../data/com_furni.xml'));
    }

    public function setUp()
    {
        $wall_array = (array)self::$data['wallitemtypes']->furnitype;
        $wall_array['type'] = Furni::WALL_TYPE;
        $this->wall_item = new Furni();
        $this->wall_item->parse($wall_array);

        $room_array = (array)self::$data['roomitemtypes']->furnitype;
        $room_array['type'] = Furni::FLOOR_TYPE;
        $this->room_item = new Furni();
        $this->room_item->parse($room_array);
    }

    public function testEntityType()
    {
        $this->assertInstanceOf('HabboAPI\Entities\Furni', $this->wall_item);
        $this->assertInstanceOf('HabboAPI\Entities\Furni', $this->room_item);
    }

    public function testName()
    {
        $this->assertEquals('Pad of stickies', $this->wall_item->getName());
        $this->assertEquals('Beige Bookcase', $this->room_item->getName());
    }


}
