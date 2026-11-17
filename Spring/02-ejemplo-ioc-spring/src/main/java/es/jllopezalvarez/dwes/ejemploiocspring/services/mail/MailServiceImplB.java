package es.jllopezalvarez.dwes.ejemploiocspring.services.mail;


import es.jllopezalvarez.dwes.ejemploiocspring.User;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Component;

@Component
@Primary
public class MailServiceImplB implements MailService {
    @Override
    public void sendUserCreatedEmail(User user){
        System.out.printf("Se envía un correo al usuario %s usando el servicio B.%n", user.getUsername());
    }
}
