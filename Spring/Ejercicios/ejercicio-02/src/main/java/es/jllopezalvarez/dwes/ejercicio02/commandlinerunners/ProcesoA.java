package es.jllopezalvarez.dwes.ejercicio02.commandlinerunners;

import es.jllopezalvarez.dwes.ejercicio02.services.DummyService;
import es.jllopezalvarez.dwes.ejercicio02.services.MessageService;
import es.jllopezalvarez.dwes.ejercicio02.services.SystemOutMessageService;
import org.springframework.boot.CommandLineRunner;
import org.springframework.core.annotation.Order;
import org.springframework.stereotype.Component;

@Component
@Order(1)
public class ProcesoA implements CommandLineRunner {

    private final MessageService messageService;


    public ProcesoA(MessageService messageService) {
        this.messageService = messageService;
    }

    @Override
    public void run(String... args) throws Exception {
        messageService.showMessage(String.format("En el método run de %s.%n", this.getClass().getName()));
    }
}
