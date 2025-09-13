import { createContext, useContext } from "react";
import { AgentData } from "./data";

const AgentDataContext = createContext<AgentData>({} as AgentData);

export const AgentDataProvider = ({ children, agentData }: { children: React.ReactNode, agentData: AgentData  }) => {
    return (
        <AgentDataContext.Provider value={agentData}>
            {children}
        </AgentDataContext.Provider>
    );
};  

export const useAgentData = () => useContext(AgentDataContext);
