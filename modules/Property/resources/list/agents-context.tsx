import { createContext, useContext } from "react";
import { Agent } from '@/modules/Hrm/resources/agents/data';

const AgentsContext = createContext([]);

export const AgentsProvider = ({ children, agents }: { children: React.ReactNode, agents: Agent[] }) => {
    return (
        <AgentsContext.Provider value={agents}>
            {children}
        </AgentsContext.Provider>
    );
};

export const useAgents = () => useContext(AgentsContext);
