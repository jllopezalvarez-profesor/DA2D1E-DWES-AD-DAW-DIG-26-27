package es.jllopezalvarez.dwes.ejercicio02.services;

import org.springframework.stereotype.Component;

@Component
public class DummyServiceImpl implements DummyService {
    @Override
    public void doNothing() {
        System.out.println("No hago nada");
    }
}
