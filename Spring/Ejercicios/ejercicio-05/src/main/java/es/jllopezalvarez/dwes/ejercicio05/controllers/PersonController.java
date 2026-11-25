package es.jllopezalvarez.dwes.ejercicio05.controllers;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class PersonController {
    @GetMapping({"/personas", "/personas/"})
    public ModelAndView list(){
        return new ModelAndView("personas/list");
    }

    @GetMapping("/personas/uno")
    public ModelAndView one(){
        return new ModelAndView("personas/one");
    }

}
