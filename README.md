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

Когда использовать?

Если создание объекта не ограничевается парой присвоений и требует вовлечения определенной логики, имеет смысл вынести ее в отдельную фабрику вместо постоянного повторения одного и того же кода.


# 🏭 Фабричный метод (англ. factory method)

Пример из реального мира

Предположим, есть менеджер по персоналу. Ей не по силам в одиночку проводить интервью на все позиции. В зависимости от требований к должности, ей нужно определить различных специалистов и передать им полномочия по проведению собеседования.

Простыми словами

Обеспечивает возможность передачи логики создания в дочерние классы.

Википедия

Фабричный метод (англ. Factory Method также известен как Виртуальный конструктор (англ. Virtual Constructor)) — порождающий шаблон проектирования, предоставляющий подклассам интерфейс для создания экземпляров некоторого класса. В момент создания наследники могут определить, какой класс создавать. Иными словами, Фабрика делегирует создание объектов наследникам родительского класса. Это позволяет использовать в коде программы не специфические классы, а манипулировать абстрактными объектами на более высоком уровне.

Когда использовать?

Полезно когда в классе присутствуют несколько общих процессов, но требуемый подкласс определяется динамично во время исполнения. Или другими словами, когда клиент не знает какой конкретно подкласс может потребоваться.


# 🔨 Абстрактная фабрика (англ. abstract factory)

Пример из реального мира

Расширим пример с дверьми из простой фабрики. В зависимости от ваших нужд вы можете захотеть деревянную дверь из магазина деревянных дверей, железную дверь из магазина железных дверей или пластиковую дверь из соответствующего магазина. Плюс вам может понадобиться установщик с нужной специальностью, например, плотник для деревянной двери, жестянщик для металической и так далее. Как вы можете видеть, теперь существует зависимость между дверми: деревянная требует плотника, металлическая - жестянщика и т.д.

Простыми словами

Фабрика фабрик; фабика, которая группирует индивидуальные, но связанные/зависимые фабрики вместе без указания их конкретных классов.

Википедия

Абстрактная фабрика (англ. Abstract factory) — порождающий шаблон проектирования, предоставляет интерфейс для создания семейств взаимосвязанных или взаимозависимых объектов, не специфицируя их конкретных классов. Шаблон реализуется созданием абстрактного класса Factory, который представляет собой интерфейс для создания компонентов системы (например, для оконного интерфейса он может создавать окна и кнопки). Затем пишутся классы, реализующие этот интерфейс.

Когда использовать?

Когда существуют взаимодействующие зависимости с не-совсем-простой логикой создания.


# 👷 Строитель (англ. builder)

Пример из реального мира

Imagine you are at Hardee's and you order a specific deal, lets say, "Big Hardee" and they hand it over to you without any questions; this is the example of simple factory. But there are cases when the creation logic might involve more steps. For example you want a customized Subway deal, you have several options in how your burger is made e.g what bread do you want? what types of sauces would you like? What cheese would you want? etc. In such cases builder pattern comes to the rescue.

Простыми словами

Allows you to create different flavors of an object while avoiding constructor pollution. Useful when there could be several flavors of an object. Or when there are a lot of steps involved in creation of an object.

Википедия

Строитель (англ. Builder) — порождающий шаблон проектирования предоставляет способ создания составного объекта.
                    
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
