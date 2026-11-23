package es.jllopezalvarez.dwes.ejemploprimeraweb.controllers;

import net.datafaker.Faker;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.ModelAndView;

import java.util.List;
import java.util.stream.Stream;

// Esta anotación es la que hace que este controlador pueda atender peticiones HTTP
@Controller
public class HomeController {


    private final Faker faker;
    private int requestCount = 0;

    public HomeController(Faker faker) {
        this.faker = faker;
    }

    //@RequestMapping()

    // Sin Thymeleaf, podemos devolver HTML directamente con estas anotaciones:
    // @GetMapping( value = {"/", ""}, produces = MediaType.TEXT_HTML_VALUE)
    // @ResponseBody
    // public String home(){
    //    return  "<p>Esto es la página inicial</p>";
    //}


    @GetMapping({"/", "", "/pepe", "/juan"})
    public String home() {
        requestCount++;
        System.out.printf("En petición nº %s.%n", requestCount);
        return "home";
    }

    @GetMapping("/antonio")
    public ModelAndView homeAntonio(Model model) {
        requestCount++;
        System.out.printf("En petición nº %s.%n", requestCount);

        ModelAndView modelAndView = new ModelAndView("homeAntonio");
        modelAndView.addObject("requestNumber", requestCount);

        List<String> names = Stream.generate(() -> faker.name().fullName()).limit(10).toList();

        modelAndView.addObject("names", names);


        return modelAndView;
    }


}
