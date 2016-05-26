About this project

I coded this on my MacBook pro with:
* apache2
* php 7.0

I included a local install of: (which is why you see a vendor's folder)
* composer
* smarty
* phpunit

Use: Upon load the project generates random current values; most of the limiting values are set to defaults with the exception of the Wine Cellar sensor. The limits can be set at runtime via variables in the associated methods. See the classes CreateDemoData and GetSensorData.

Development notes:

I had hoped to use a virtual machine using vagrant; the install, configuration, and conflict resolution was just taking too much time.

I also had some trouble with pathing in smarty, which is why there is a smarty folder with only the templates_c folder, and a templates folder for the templates. While smarty itself is relatively easy to write a template of this simplicity, the install was bearish. IMHO, of course.

I did quite a few tests during development; these would fail at the moment because of late refactoring, and I don't have complete coverage. I include them so that you can see how I write tests. And that I do.

The design as it stands attempts to be a one-size-fits-most tool. I had started down a path with separate logic for temperatures, for glass breaking, for smoke, but realized all of them were dealing with limits - upper, lower, or both.

Having said that, I didn't try to squeeze the door sensor into that paradigm; it stands alone as a 'simple' test. In the next refactoring I'd probably find a way that it really did fit the limits model.

But one can refactor to missing deadlines, so...

And I'm testing the Garage door because I'm always wondering if I closed mine.

I think I let separation of concerns down a bit in the template - using the alarm value to set the class. Although, that design element is variable...so that's my story and I'm sticking with it (for now).