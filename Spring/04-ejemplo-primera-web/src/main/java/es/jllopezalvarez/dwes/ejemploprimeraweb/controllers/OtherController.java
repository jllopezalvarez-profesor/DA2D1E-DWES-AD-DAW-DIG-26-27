package es.jllopezalvarez.dwes.ejemploprimeraweb.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class OtherController {
    @PostMapping("/pepe")
    public String something(){
        return "something";
    }
}
