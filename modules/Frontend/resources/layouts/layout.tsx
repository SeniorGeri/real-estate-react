import { Navigation } from "./navigation"
import { Footer } from "./footer"
import { LocaleProvider } from '@/contexts/locale';

// co/nst changeLanguage = (lng: string) => {
//     i18n.changeLanguage(lng);
//     localStorage.setItem('language', lng); // Store language preference
// };

export default ({ children  }: { children: React.ReactNode }) => 
  (
      <LocaleProvider>
        <div className="min-h-screen flex flex-col px-4 justify-between">
          <Navigation />
          {children}
          <Footer />
        </div>
      </LocaleProvider>
);
