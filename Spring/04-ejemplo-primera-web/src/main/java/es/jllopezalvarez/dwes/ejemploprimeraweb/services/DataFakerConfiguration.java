package es.jllopezalvarez.dwes.ejemploprimeraweb.services;

import net.datafaker.Faker;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.util.Locale;

@Configuration
public class DataFakerConfiguration {
    @Bean
    public Faker getFaker(){
        return new Faker(Locale.forLanguageTag("es"));
    }
}
