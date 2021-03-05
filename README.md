# Порождающие Шаблоны Проектирования

Простыми словами:

Порождающие шаблоны (англ. Creational patterns) сфокусированы на процессе инстанцирования объектов или групп связанных объектов

Википедия:

Порождающие шаблоны - шаблоны проектирования, которые абстрагируют процесс инстанцирования. Они позволяют сделать систему независимой от способа создания, композиции и представления объектов. Шаблон, порождающий классы, использует наследование, чтобы изменять наследуемый класс, а шаблон, порождающий объекты, делегирует инстанцирование другому объекту.

- Простая фабрика
- Фабричный метод
- Абстрактная фабрика
- Строитель
- Прототип
- Одиночка

# 🏠 Простая фабрика (англ. simple factory)

Пример из реального мира

Представьте, вы стоите дом и вам нужны двери. Это было бы не оправданно, если бы каждый раз, когда вам требуется дверь, вы бы надевали костюм плотника и начинали делать дверь самостоятельно. Вместо этого, дверь для вас могут сделать на фабрике.

Простыми словами

Простая фабрика просто создает экземпляр для клиента не предоставляя клиенту какой либо логики создания.

Википедия

В объектно-ориентированном программировании (ООП), фабрика - это объект, создающий другие объекты. Формально фабрика это функция или метод, вызов которой возвращает объекты различных классов или прототипов, которые можно считать "новыми".

Пример кода

Прежде всего у нас есть интерфейс door и его имплементация

interface Door
{
    public function getWidth(): float;
    public function getHeight(): float;
}
class WoodenDoor implements Door
{
    protected $width;
    protected $height; 
    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function getWidth(): float
    {
        return $this->width;
    }
    public function getHeight(): float
    {
        return $this->height;
    }
}

Затем фабрика DoorFactory создает двери и возвращает их.

class DoorFactory
{
    public static function makeDoor($width, $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}

И затем, мы это можем использовать так

$door = DoorFactory::makeDoor(100, 200);
echo 'Width: ' . $door->getWidth();
echo 'Height: ' . $door->getHeight();

Когда использовать?

Если создание объекта не ограничевается парой присвоений и требует вовлечения определенной логики, имеет смысл вынести ее в отдельную фабрику вместо постоянного повторения одного и того же кода.

# 🏭 Фабричный метод (англ. factory method)

Пример из реального мира

Предположим, есть менеджер по персоналу. Ей не по силам в одиночку проводить интервью на все позиции. В зависимости от требований к должности, ей нужно определить различных специалистов и передать им полномочия по проведению собеседования.

Простыми словами

Обеспечивает возможность передачи логики создания в дочерние классы.

Википедия

Фабричный метод (англ. Factory Method также известен как Виртуальный конструктор (англ. Virtual Constructor)) — порождающий шаблон проектирования, предоставляющий подклассам интерфейс для создания экземпляров некоторого класса. В момент создания наследники могут определить, какой класс создавать. Иными словами, Фабрика делегирует создание объектов наследникам родительского класса. Это позволяет использовать в коде программы не специфические классы, а манипулировать абстрактными объектами на более высоком уровне.

Пример кода

Возьмем пример нашего менеджера по персоналу. Прежде всего создадим интерфейс Interviewer и несколько его реализаций.

interface Interviewer
{
    public function askQuestions();
}
class Developer implements Interviewer
{
    public function askQuestions()
    {
        echo 'Asking about design patterns!';
    }
}

class CommunityExecutive implements Interviewer
{
    public function askQuestions()
    {
        echo 'Asking about community building';
    }
}

Теперь давайте создадим HiringManager

abstract class HiringManager
{
    // Factory method
    abstract public function makeInterviewer(): Interviewer;
    public function takeInterview()
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}

Теперь любой потомок может наследовать его и предоставить требуемый Interviewer

class DevelopmentManager extends HiringManager
{
    public function makeInterviewer(): Interviewer
    {
        return new Developer();
    }
}

class MarketingManager extends HiringManager
{
    public function makeInterviewer(): Interviewer
    {
        return new CommunityExecutive();
    }
}

затем это может быть использованно следующим образом

$devManager = new DevelopmentManager();
$devManager->takeInterview(); // Output: Asking about design patterns
$marketingManager = new MarketingManager();
$marketingManager->takeInterview(); // Output: Asking about community building.

Когда использовать?

Полезно когда в классе присутствуют несколько общих процессов, но требуемый подкласс определяется динамично во время исполнения. Или другими словами, когда клиент не знает какой конкретно подкласс может потребоваться.

# 🔨 Абстрактная фабрика (англ. abstract factory)

Пример из реального мира

Расширим пример с дверьми из простой фабрики. В зависимости от ваших нужд вы можете захотеть деревянную дверь из магазина деревянных дверей, железную дверь из магазина железных дверей или пластиковую дверь из соответствующего магазина. Плюс вам может понадобиться установщик с нужной специальностью, например, плотник для деревянной двери, жестянщик для металической и так далее. Как вы можете видеть, теперь существует зависимость между дверми: деревянная требует плотника, металлическая - жестянщика и т.д.

Простыми словами

Фабрика фабрик; фабика, которая группирует индивидуальные, но связанные/зависимые фабрики вместе без указания их конкретных классов.

Википедия

Абстрактная фабрика (англ. Abstract factory) — порождающий шаблон проектирования, предоставляет интерфейс для создания семейств взаимосвязанных или взаимозависимых объектов, не специфицируя их конкретных классов. Шаблон реализуется созданием абстрактного класса Factory, который представляет собой интерфейс для создания компонентов системы (например, для оконного интерфейса он может создавать окна и кнопки). Затем пишутся классы, реализующие этот интерфейс.

Пример кода

Реализуем описанный пример с дверьми. Прежде всего у нас будет интерфейс Door и несколько его имплементаций.

interface Door
{
    public function getDescription();
}
class WoodenDoor implements Door
{
    public function getDescription()
    {
        echo 'I am a wooden door';
    }
}
class IronDoor implements Door
{
    public function getDescription()
    {
        echo 'I am an iron door';
    }
}

Затем у нас будут несколько соответствующих экспертов для каждого вида двери

interface DoorFittingExpert
{
    public function getDescription();
}
class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit iron doors';
    }
}

class Carpenter implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit wooden doors';
    }
}

Теперь создадим абстрактную фабрику, которая бы позволяла создавать семейство взаимосвязанных объектов, например, фабрика деревянных дверей создает деревянную двурь и эксперта по деревянным дверям, а фабрика железных дверей должна создавать железные двери и экспертов по ним.

interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}
// Wooden factory to return carpenter and wooden door
class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }
    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

// Iron door factory to get iron door and the relevant fitting expert
class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }
    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}

затем это может быть использованно следующим образом

$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Output: I am a wooden door
$expert->getDescription(); // Output: I can only fit wooden doors

// Same for Iron Factory
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Output: I am an iron door
$expert->getDescription(); // Output: I can only fit iron doors
Как вы можете видеть, фабрика деревянных дверей инкапсулирует carpenter и wooden door, в то время как фабрика железных дверей инкапсулирует iron door и welder. И таким образом, это дает нам уверенность, что для каждой созданной двери мы не перепутаем соответствующего эксперта.

Когда использовать?

Когда существуют взаимодействующие зависимости с не-совсем-простой логикой создания.

# 👷 Строитель (англ. builder)

Пример из реального мира

Imagine you are at Hardee's and you order a specific deal, lets say, "Big Hardee" and they hand it over to you without any questions; this is the example of simple factory. But there are cases when the creation logic might involve more steps. For example you want a customized Subway deal, you have several options in how your burger is made e.g what bread do you want? what types of sauces would you like? What cheese would you want? etc. In such cases builder pattern comes to the rescue.

Простыми словами

Allows you to create different flavors of an object while avoiding constructor pollution. Useful when there could be several flavors of an object. Or when there are a lot of steps involved in creation of an object.

Википедия

Строитель (англ. Builder) — порождающий шаблон проектирования предоставляет способ создания составного объекта.

Having said that let me add a bit about what telescoping constructor anti-pattern is. At one point or the other we have all seen a constructor like below:

public function __construct($size, $cheese = true, $pepperoni = true, $tomato = false, $lettuce = true)
{
}

As you can see; the number of constructor parameters can quickly get out of hand and it might become difficult to understand the arrangement of parameters. Plus this parameter list could keep on growing if you would want to add more options in future. This is called telescoping constructor anti-pattern.

Пример кода

The sane alternative is to use the builder pattern. First of all we have our burger that we want to make

class Burger
{
    protected $size;
    protected $cheese = false;
    protected $pepperoni = false;
    protected $lettuce = false;
    protected $tomato = false;
    public function __construct(BurgerBuilder $builder)
    {
        $this->size = $builder->size;
        $this->cheese = $builder->cheese;
        $this->pepperoni = $builder->pepperoni;
        $this->lettuce = $builder->lettuce;
        $this->tomato = $builder->tomato;
    }
}

And then we have the builder

class BurgerBuilder
{
    public $size;
    public $cheese = false;
    public $pepperoni = false;
    public $lettuce = false;
    public $tomato = false;
    public function __construct(int $size)
    {
        $this->size = $size;
    }
    public function addPepperoni()
    {
        $this->pepperoni = true;
        return $this;
    }
    public function addLettuce()
    {
        $this->lettuce = true;
        return $this;
    }
    public function addCheese()
    {
        $this->cheese = true;
        return $this;
    }
    public function addTomato()
    {
        $this->tomato = true;
        return $this;
    }
    public function build(): Burger
    {
        return new Burger($this);
    }
}

И затем, мы это можем использовать так:

$burger = (new BurgerBuilder(14))
                    ->addPepperoni()
                    ->addLettuce()
                    ->addTomato()
                    ->build();
                    
Когда использовать?

When there could be several flavors of an object and to avoid the constructor telescoping. The key difference from the factory pattern is that; factory pattern is to be used when the creation is a one step process while builder pattern is to be used when the creation is a multi step process.

# 🐑 Прототип (англ. prototype)

Пример из реального мира

Remember dolly? The sheep that was cloned! Lets not get into the details but the key point here is that it is all about cloning

Простыми словами

Create object based on an existing object through cloning.

Википедия

Задаёт виды создаваемых объектов с помощью экземпляра-прототипа и создаёт новые объекты путём копирования этого прототипа. Он позволяет уйти от реализации и позволяет следовать принципу «программирование через интерфейсы». В качестве возвращающего типа указывается интерфейс/абстрактный класс на вершине иерархии, а классы-наследники могут подставить туда наследника, реализующего этот тип. Проще говоря, это паттерн создания объекта через клонирование другого объекта вместо создания через конструктор.

In short, it allows you to create a copy of an existing object and modify it to your needs, instead of going through the trouble of creating an object from scratch and setting it up.

Пример кода

In PHP, it can be easily done using clone

class Sheep
{
    protected $name;
    protected $category;
    public function __construct(string $name, string $category = 'Mountain Sheep')
    {
        $this->name = $name;
        $this->category = $category;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setCategory(string $category)
    {
        $this->category = $category;
    }
    public function getCategory()
    {
        return $this->category;
    }
}

Then it can be cloned like below

$original = new Sheep('Jolly');
echo $original->getName(); // Jolly
echo $original->getCategory(); // Mountain Sheep

// Clone and modify what is required
$cloned = clone $original;
$cloned->setName('Dolly');
echo $cloned->getName(); // Dolly
echo $cloned->getCategory(); // Mountain sheep
Also you could use the magic method __clone to modify the cloning behavior.

Когда использовать?

When an object is required that is similar to existing object or when the creation would be expensive as compared to cloning.

# 💍 Одиночка (англ. singleton)

Пример из реального мира

There can only be one president of a country at a time. The same president has to be brought to action, whenever duty calls. President here is singleton.

Простыми словами

Ensures that only one object of a particular class is ever created.

Википедия

Одиночка (англ. Singleton) — порождающий шаблон проектирования, гарантирующий, что в однопроцессном приложении будет единственный экземпляр некоторого класса, и предоставляющий глобальную точку доступа к этому экземпляру..

Singleton pattern is actually considered an anti-pattern and overuse of it should be avoided. It is not necessarily bad and could have some valid use-cases but should be used with caution because it introduces a global state in your application and change to it in one place could affect in the other areas and it could become pretty difficult to debug. The other bad thing about them is it makes your code tightly coupled plus it mocking the singleton could be difficult.

Пример кода

To create a singleton, make the constructor private, disable cloning, disable extension and create a static variable to house the instance

final class President
{
    private static $instance;
    private function __construct()
    {
        // Hide the constructor
    }
    public static function getInstance(): President
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone()
    {
        // Disable cloning
    }
    private function __wakeup()
    {
        // Disable unserialize
    }
}

Then in order to use

$president1 = President::getInstance();
$president2 = President::getInstance();

var_dump($president1 === $president2); // true
