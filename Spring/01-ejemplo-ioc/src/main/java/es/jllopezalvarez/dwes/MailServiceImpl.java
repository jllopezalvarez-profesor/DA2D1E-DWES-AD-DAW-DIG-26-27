package es.jllopezalvarez.dwes;

public class MailServiceImpl implements MailService {
    @Override
    public void sendUserCreatedEmail(User user){
        System.out.printf("Se envía un correo al usuario %s.%n", user.getUsername());
    }
}
