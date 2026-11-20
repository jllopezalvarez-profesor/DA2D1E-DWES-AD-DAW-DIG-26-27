package es.jllopezalvarez.dwes.ejemplobeansspring.components;

import org.springframework.stereotype.Component;

@Component
public class MyComponentImpl implements MyComponent {
    @Override
    public void DoNothing() {
        System.out.println("En DoNothing de MyComponentImpl");
    }
}
