package es.jllopezalvarez.dwes.ejemplobeansspring.commandlinerunners;

import es.jllopezalvarez.dwes.ejemplobeansspring.components.MyComponent;
import es.jllopezalvarez.dwes.ejemplobeansspring.components.MyXmlComponent;
import net.datafaker.Faker;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

@Component
public class MyCommandLineRunner implements CommandLineRunner {
    private final MyComponent myComponent;
    private final MyXmlComponent myXmlComponent;
    private final Faker faker;

    public MyCommandLineRunner(MyComponent myComponent, MyXmlComponent myXmlComponent, Faker faker) {
        this.myComponent = myComponent;
        this.myXmlComponent = myXmlComponent;
        this.faker = faker;
    }

    @Override
    public void run(String... args) throws Exception {
        System.out.println("En el command line runner");

        myComponent.DoNothing();

        myXmlComponent.DoNothing();

        System.out.println(faker.name().fullName());




    }
}
