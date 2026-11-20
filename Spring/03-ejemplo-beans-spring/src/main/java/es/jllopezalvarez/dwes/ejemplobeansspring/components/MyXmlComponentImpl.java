package es.jllopezalvarez.dwes.ejemplobeansspring.components;

import org.springframework.stereotype.Component;
// En lugar de con la anotación Component, se define en XML
// @Component
public class MyXmlComponentImpl implements MyXmlComponent {
    public void DoNothing() {
        System.out.println("En DoNothing de MyXmlComponentImpl");
    }
}
