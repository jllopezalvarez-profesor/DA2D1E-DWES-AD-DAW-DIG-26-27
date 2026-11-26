package es.jllopezalvarez.dwes.ejercicio05.controllers;

import es.jllopezalvarez.dwes.ejercicio05.services.PersonService;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class PersonController {

    private final PersonService personService;

    public PersonController(PersonService personService) {
        this.personService = personService;
    }

    @GetMapping({"/personas", "/personas/"})
    public ModelAndView list(){
        ModelAndView modelAndView = new ModelAndView("personas/list");
        modelAndView.addObject("people", personService.find(10));
        return modelAndView;
    }

    @GetMapping("/personas/uno")
    public ModelAndView one(){
        ModelAndView modelAndView = new ModelAndView("personas/one");
        modelAndView.addObject("person", personService.findOne());
        return modelAndView;
    }

}
