import { createContext, useContext } from "react";
import { City } from "../cities/data";

const CitiesContext = createContext([]);

export const CitiesProvider = ({ children, cities }: { children: React.ReactNode, cities: City[] }) => {
    return (
        <CitiesContext.Provider value={cities}>
            {children}
        </CitiesContext.Provider>
    );
};

export const useCities = () => useContext(CitiesContext);
