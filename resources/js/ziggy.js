const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"telescope":{"uri":"telescope\/{view?}","methods":["GET","HEAD"],"wheres":{"view":"(.*)"},"parameters":["view"]},"site.homepage":{"uri":"\/","methods":["GET","HEAD"]},"site.ourDoctors":{"uri":"doctors","methods":["GET","HEAD"]},"site.services":{"uri":"services","methods":["GET","HEAD"]},"site.ohp":{"uri":"our-happy-patients","methods":["GET","HEAD"]},"site.aboutUs":{"uri":"about-us","methods":["GET","HEAD"]},"login":{"uri":"site-admin\/login","methods":["GET","HEAD"]},"login.attempt":{"uri":"site-admin\/login","methods":["POST"]},"cms.homepage.show":{"uri":"site-admin\/homepage","methods":["GET","HEAD"]},"cms.homepage.addBanner":{"uri":"site-admin\/homepage\/add-banner","methods":["POST"]},"cms.homepage.removeBanner":{"uri":"site-admin\/homepage\/remove-banner","methods":["DELETE"]},"cms.homepage.addBeforeAndAfter":{"uri":"site-admin\/homepage\/before-and-after","methods":["POST"]},"cms.homepage.deleteBeforeAndAfter":{"uri":"site-admin\/homepage\/before-and-after","methods":["DELETE"]},"cms.services.index":{"uri":"site-admin\/services","methods":["GET","HEAD"]},"cms.services.addService":{"uri":"site-admin\/services\/add-service","methods":["POST"]},"cms.services.updateService":{"uri":"site-admin\/services\/update-service","methods":["PATCH"]},"cms.services.deleteService":{"uri":"site-admin\/services\/delete-service","methods":["DELETE"]},"cms.otherServices.update":{"uri":"site-admin\/services\/update-other-services","methods":["PATCH"]},"cms.branches.index":{"uri":"site-admin\/branches","methods":["GET","HEAD"]},"cms.branches.create":{"uri":"site-admin\/branches","methods":["POST"]},"cms.branches.delete":{"uri":"site-admin\/branches","methods":["DELETE"]},"cms.branches.update":{"uri":"site-admin\/branches\/update","methods":["POST"]},"cms.ourdoctors.index":{"uri":"site-admin\/doctors","methods":["GET","HEAD"]},"cms.ourdoctos.addBanner":{"uri":"site-admin\/doctors\/add-banner","methods":["POST"]},"cms.ourdoctos.deleteBanner":{"uri":"site-admin\/doctors\/delete-banner","methods":["DELETE"]},"cms.ourdoctors.updateDocJustin":{"uri":"site-admin\/doctors\/update-doc-justin","methods":["POST"]},"cms.ourdoctors.addDoctor":{"uri":"site-admin\/doctors\/add-doctor","methods":["POST"]},"cms.ourdoctors.deleteDoctor":{"uri":"site-admin\/doctors\/delete-doctor","methods":["DELETE"]},"cms.ourdoctors.updateDoctor":{"uri":"site-admin\/doctors\/update-doctor","methods":["POST"]},"cms.ohp.index":{"uri":"site-admin\/our-happy-patients","methods":["GET","HEAD"]},"cms.ohp.create":{"uri":"site-admin\/our-happy-patients\/create-testimonial","methods":["POST"]},"cms.ohp.update":{"uri":"site-admin\/our-happy-patients\/update-testimonial","methods":["POST"]},"cms.ohp.delete":{"uri":"site-admin\/our-happy-patients\/delete-testimonial","methods":["DELETE"]},"cms.aboutus.index":{"uri":"site-admin\/about-us","methods":["GET","HEAD"]},"cms.ourStory.updateOurStory":{"uri":"site-admin\/about-us\/update-our-story","methods":["POST"]},"cms.founders.updateFounders":{"uri":"site-admin\/about-us\/update-founders","methods":["POST"]},"cms.aboutUs.createPersonel":{"uri":"site-admin\/about-us\/create-personel","methods":["POST"]},"cms.aboutUs.deletePersonel":{"uri":"site-admin\/about-us\/delete-personel","methods":["DELETE"]},"cms.banners.addBanner":{"uri":"site-admin\/banners\/add-banner","methods":["POST"]},"cms.banners.deleteBanner":{"uri":"site-admin\/banners\/delete-banner","methods":["DELETE"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };