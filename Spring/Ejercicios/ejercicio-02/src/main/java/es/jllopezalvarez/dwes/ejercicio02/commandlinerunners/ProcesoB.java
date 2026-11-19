package es.jllopezalvarez.dwes.ejercicio02.commandlinerunners;

import es.jllopezalvarez.dwes.ejercicio02.services.MessageService;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.CommandLineRunner;
import org.springframework.core.Ordered;
import org.springframework.stereotype.Component;

@Component
public class ProcesoB implements CommandLineRunner, Ordered {
    private final MessageService messageService;

    public ProcesoB(@Qualifier("systemErrMessageService") MessageService messageService) {
        this.messageService = messageService;
    }

    @Override
    public void run(String... args) throws Exception {
        messageService.showMessage(String.format("En el método run de %s.%n", this.getClass().getName()));
    }

    @Override
    public int getOrder() {
        return 0;
    }
}
