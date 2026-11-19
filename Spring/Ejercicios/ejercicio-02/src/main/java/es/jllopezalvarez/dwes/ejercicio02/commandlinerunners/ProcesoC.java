package es.jllopezalvarez.dwes.ejercicio02.commandlinerunners;

import es.jllopezalvarez.dwes.ejercicio02.services.MessageService;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

@Component
public class ProcesoC implements CommandLineRunner {
    private final MessageService messageService;

    public ProcesoC(MessageService messageService) {
        this.messageService = messageService;
    }

    @Override
    public void run(String... args) throws Exception {
        messageService.showMessage(String.format("En el método run de %s.%n", this.getClass().getName()));
    }
}
