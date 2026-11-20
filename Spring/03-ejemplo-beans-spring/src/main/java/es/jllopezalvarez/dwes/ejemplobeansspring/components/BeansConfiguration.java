package es.jllopezalvarez.dwes.ejemplobeansspring.components;


import net.datafaker.Faker;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.util.Locale;

@Configuration
public class BeansConfiguration {

    @Bean
    public Faker getFaker(){
        return new Faker(Locale.forLanguageTag("es"));
    }

}
