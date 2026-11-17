package es.jllopezalvarez.dwes.ejemploiocspring.services.mail;


import es.jllopezalvarez.dwes.ejemploiocspring.User;

public interface MailService {
    void sendUserCreatedEmail(User user);
}
