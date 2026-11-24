package es.jllopezalvarez.dwes.ejemploprimeraweb.services;

import net.datafaker.Faker;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.stream.Stream;

@Service
public class NameServiceImpl implements NameService {
    private final Faker faker;

    public NameServiceImpl(Faker faker) {
        this.faker = faker;
    }

    @Override
    public List<String> getRandomNames(int count) {
        return Stream.generate(() -> faker.name().fullName()).limit(count).toList();
    }
}
