package es.jllopezalvarez.dwes.ejercicio02.services;

import org.springframework.stereotype.Component;

@Component
public class SystemErrMessageService implements MessageService {
    @Override
    public void showMessage(String message) {
        System.err.println(message);
    }
}
