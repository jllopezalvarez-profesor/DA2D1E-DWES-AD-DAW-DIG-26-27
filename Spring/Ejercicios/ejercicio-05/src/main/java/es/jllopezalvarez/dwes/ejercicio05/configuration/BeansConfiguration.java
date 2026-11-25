package es.jllopezalvarez.dwes.ejercicio05.configuration;

import net.datafaker.Faker;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.util.Locale;

@Configuration
public class BeansConfiguration {

    @Bean
    public Faker faker(){
        return new Faker(Locale.forLanguageTag("es"));
    }

}
