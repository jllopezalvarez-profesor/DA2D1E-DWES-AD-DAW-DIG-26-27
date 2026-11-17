package es.jllopezalvarez.dwes.ejemploiocspring.services.mail;


import es.jllopezalvarez.dwes.ejemploiocspring.User;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Component;

@Component

public class MailServiceImplA implements MailService {
    @Override
    public void sendUserCreatedEmail(User user){
        System.out.printf("Se envía un correo al usuario %s usando el servicio A.%n", user.getUsername());
    }
}
